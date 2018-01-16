<?php

/**
 * 日历
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 15:35
 */
class calendar
{
    private $year, $month, $day;
    private $week = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
    private $_month = array(
        "01" => "一月",
        "02" => "二月",
        "03" => "三月",
        "04" => "四月",
        "05" => "五月",
        "06" => "六月",
        "07" => "七月",
        "08" => "八月",
        "09" => "九月",
        "10" => "十月",
        "11" => "十一月",
        "12" => "十二月"
    );

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    function getWeek($year, $month, $day)
    {
        $week = date('w', mktime(0, 0, 0, $month, $day, $year));
        return $week;
    }

    function _env()
    {
        if (isset($_POST['month'])) $this->month = $_POST['month'];
        else $this->month = date('m');
        if (isset($_POST['year'])) $this->year = $_POST['year'];
        else $this->year = date('Y');
        $this->setYear($this->year);
        $this->setMonth($this->month);
        $this->setDay(date('d'));
    }

    /**
     * 输出日历
     */
    function OUT()
    {
        $this->_env();
        $week = $this->getWeek($this->year, $this->month, $this->day); // 获取该日期为星期几
        $fweek = $this->getWeek($this->year, $this->month, 1);// 获取当月的第一天为星期几
        echo "<div style=width:255px;font-size:9px;> <form action=$_SERVER[PHP_SELF] method='post' style='margin:0'> <select name='month' onchange='this.form.submit();'>";
        for ($ttmpa = 1; $ttmpa <= 12; $ttmpa++) {
            $ttmpa = sprintf("%02d", $ttmpa);
            if (strcmp($ttmpa, $this->month) == 0) {
                $select = "selected style='background-color:#FAFDE2'";
            } else {
                $select = '';
            }
            echo "<option value='$ttmpa' $select>" . $this->_month[$ttmpa] . "</option>";
        }
        echo "</select><select name='year' onchange='this.form.submit();'>";
        for ($ctmpa = $this->year - 10; $ctmpa < $this->year + 10; $ctmpa++) {
            if ($ctmpa > 2050) break;
            if ($ctmpa < 1980) break;
            if (strcmp($ctmpa, $this->year) == 0) {
                $select = "selected style='background-color:#FAFDE2'";
            } else {
                $select = '';
            }
            echo "<option value='$ctmpa' $select>" . $ctmpa . "</option>";
        }
        echo "</select>   
        </form><br/>  
        <table border=0 align=center>";
        for ($Tmpa = 0; $Tmpa < count($this->week); $Tmpa++) {    //输出星期的标头
            echo "<td>" . $this->week[$Tmpa] . "</td>";
        }
        for ($tmpb = 1; $tmpb <= date("t", mktime(0, 0, 0, $this->month, $this->day, $this->year)); $tmpb++) {    //输出所有日期
            if (strcmp($tmpb, $this->day) == 0) {  //获得当前日期，并采用特色颜色做为标记
                $flag = " bgcolor='#FF3366'";
            } else {
                $flag = ' bgcolor=#FAFDE2';
            }
            if ($tmpb == 1) {
                echo "<tr>";
                for ($tmpc = 0; $tmpc < $fweek; $tmpc++) {
                    echo "<td></td>";
                }
            }
            if (strcmp($this->getweek($this->year, $this->month, $tmpb), 0) == 0) { //如果是周日
                echo "<tr><td align='center' $flag>$tmpb</td>";
            } else {
                echo "<td align='center' $flag>$tmpb</td>";
            }
        }
        echo "</table></div>";
    }
}

$calendar = new calendar();
$calendar->OUT();