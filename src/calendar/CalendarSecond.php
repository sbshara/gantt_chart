<?php

namespace sbshara\gantt_chart\Calendar;

class CalendarSecond extends CalendarObj {
    
    function int() {
        return $this->secondINT;
    }
    
    function next() {
        return $this->plus('1second')->second();
    }
    
    function prev() {
        return $this->minus('1second')->second();
    }
    
}