<?php


namespace App\Util;


use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Spatie\OpeningHours\TimeRange;

class OpeningHours extends \Spatie\OpeningHours\OpeningHours implements CastsAttributes, Arrayable, Jsonable
{

    /**
     * @return array
     */
    public static function getDays()
    {
        return [
            'monday' => 'Maandag',
            'tuesday' => 'Dinsdag',
            'wednesday' => 'Woensdag',
            'thursday' => 'Donderdag',
            'friday' => 'Vrijdag',
            'saturday' => 'Zaterdag',
            'sunday' => 'Zondag'
        ];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $result = new self();
        if($value) {
            $result = self::create(json_decode($value, true));
        }
        return $result;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return OpeningHours|array|mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if(!is_array($value) && !$value instanceof OpeningHours) {
            throw new \InvalidArgumentException('Opening hours must be either an array or \\App\\Util\\OpeningHours');
        }

        if(is_array($value)) {
            $value = self::create($value);
        }

        return $value;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $format = 'H:i';
        $timezone = null;

        $result = [];
        foreach ($this->openingHours as $day => $openingHoursForDay) {
            $result[$day] =  $openingHoursForDay->map(function (TimeRange $timeRange) use ($format, $timezone, $day) {
                return $timeRange->start()->format($format, $timezone).'-'.$timeRange->end()->format($format, $timezone);
            });
        }

        $result['exceptions'] = [];
        foreach ($this->exceptions as $date => $openingHoursForDay) {
            $result['exceptions'][$date] =  $openingHoursForDay->map(function (TimeRange $timeRange) use ($format, $timezone) {
                return $timeRange->start()->format($format, $timezone).'-'.$timeRange->end()->format($format, $timezone);
            });
        }

        return $result;
    }


    /**
     * @return false|string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * @param int $options
     * @return false|string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }
}
