<?php namespace SistemApi\Model\Base;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;
use SistemApi\Model\Resim;

/**
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Model implements Arrayable, Jsonable
{
    private $models = [
        'resim' => Resim::class
    ];

    private $array_models = [
        'dil_metalar'
    ];

    protected $attributes = [];

    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    protected $timestamps = true;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    public function __construct($attributes = null)
    {
        if (is_object($attributes)) {
            $this->fill(get_object_vars($attributes));
        } elseif (is_array($attributes)) {
            $this->fill($attributes);
        } elseif (is_null($attributes)) {
            // nothing
        } else {
            // throw new \Exception('$attributes must be one of [object, array, null]');
        }
    }

    public function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }

    public function toJson($options = 0)
    {
        return json_encode($this->attributes, $options);
    }

    public function toArray()
    {
        $attributes = [];

        foreach ($this->attributes as $key => $attribute) {

            if ($attribute instanceof Collection) {
                $attributes[$key] = $attribute->toArray();
            } else {
                $attributes[$key] = $attribute;
            }

        }

        return $attributes;
    }

    public function getValueByDilIdKey($dilId, $key)
    {
        if ($this->dil_metalar instanceof Collection) {
            return isset($this->dil_metalar->get($dilId)[$key]) ?
                $this->dil_metalar->get($dilId)[$key] :
                null;
        }

        return null;
    }

    /**
     * Get the attributes that should be converted to dates.
     *
     * @return array
     */
    public function getDates()
    {
        return $this->timestamps ? array_merge($this->dates, [static::CREATED_AT, static::UPDATED_AT]) : $this->dates;
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if (is_null($value)) {
            return $this;
        }

        if (in_array($key, $this->array_models)) {

            /*
            if (method_exists($this, 'set' . Str::studly($key))) {
                $method_name = 'set' . Str::studly($key);
                $this->$method_name($value);
                return $this;
            }
            */

            $values = new Collection();
            foreach ($value as $index => $item) {
                $values->put($index, (array) $item);
            }
            $value = $values;
        }

        elseif (is_object($value) && array_key_exists($key, $this->models)) {
            $class_name = $this->models[$key];
            $value = new $class_name($value);
        }

        // If an attribute is listed as a "date", we'll convert it from a DateTime
        // instance into a form proper for storage on the database tables using
        // the connection grammar's date format. We will auto set the values.
        elseif ($value && in_array($key, $this->getDates())) {
            $value = $this->asDateTime($value);
        }

        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Return a timestamp as DateTime object.
     *
     * @param  mixed  $value
     * @return \Carbon\Carbon
     */
    protected function asDateTime($value)
    {
        // If this value is already a Carbon instance, we shall just return it as is.
        // This prevents us having to re-instantiate a Carbon instance when we know
        // it already is one, which wouldn't be fulfilled by the DateTime check.
        if ($value instanceof Carbon) {
            return $value;
        }

        // If the value is already a DateTime instance, we will just skip the rest of
        // these checks since they will be a waste of time, and hinder performance
        // when checking the field. We will just return the DateTime right away.
        if ($value instanceof \DateTimeInterface) {
            return new Carbon(
                $value->format('Y-m-d H:i:s.u'), $value->getTimeZone()
            );
        }

        // If this value is an integer, we will assume it is a UNIX timestamp's value
        // and format a Carbon object from this timestamp. This allows flexibility
        // when defining your date fields as they might be UNIX timestamps here.
        if (is_numeric($value)) {
            return Carbon::createFromTimestamp($value);
        }

        // If the value is in simply year, month, day format, we will instantiate the
        // Carbon instances from that format. Again, this provides for simple date
        // fields on the database, while still supporting Carbonized conversion.
        if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $value)) {
            return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
        }

        // Finally, we will just assume this date is in the format used by default on
        // the database connection and use that format to create the Carbon object
        // that is returned back out to the developers after we convert it here.
        return Carbon::createFromFormat($this->dateFormat, $value);
    }

    public function __get($key)
    {
        return array_key_exists($key, $this->attributes) ? $this->attributes[$key] : null;
    }

    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
}