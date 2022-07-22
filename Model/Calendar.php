<?php

class Calendar{
public $days = ['Monday','Tuesday','Wenesday','thursday','Friday','Saturday','Sunday'];
private $months= [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
public $month;
public $year;
    /**
    *@param int $month
    *@param int $year
    *@throws Exception
    */
    public function __construct(int $month = null , int $year = null)
    {
        if ($month === null || $month < 1 || $month > 12){
            $month = intval(date('m'));
        }
        if ($year === null ){
            $year = intval(date('Y'));
        }
        $this->month = $month;
        $this->year = $year;
    }

    public function getStartingDay ():  \Datetime{
        return new \Datetime("{$this->year}-{$this->month}-01");
    }
    /**
     *@return string
     */
   
    public function toString () : string{
       return $this->months[$this->month - 1] . ' ' .$this->year ;
    }
    public function getWeeks (): int {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day');
        /*var_dump ($start->format('W'), $end->format('W')); tsy dia ilaina*/
        $weeks = intval($end->format('W')) - intval($start->format('W'))+1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    public function withinMonth (\DateTime $date): bool {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }
    public function nextMonth(): Calendar
    {
        $month = $this->month + 1 ;
        $year = $this->year ;
        if ($month > 12 ) {
            $month = 1 ;
            $year += 1 ;
        }
        return new Calendar ($month, $year);
    }
    public function previousMonth(): Calendar
    {
        $month = $this->month - 1 ;
        $year = $this->year ;
        if ($month < 1 ) {
            $month = 12;
            $year -= 1;
        }
        return new Calendar($month, $year);
    }

}



?> 