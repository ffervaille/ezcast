<?php

class EventStatus {
    
    // All is ok
    const AUTO_SUCCESS = "AUTO_SUCCESS";
    // Finish but critical error
    const AUTO_SUCCESS_ERRORS = "AUTO_SUCCESS_ERRORS";
    // Finish but warnings / errors
    const AUTO_SUCCESS_WARNINGS = "AUTO_SUCCESS_WARNINGS";
    // Fail treatment
    const AUTO_FAILURE = "AUTO_FAILURE";
    
    // All is ok
    const MANUAL_OK = "MANUAL_OK";
    // Ok but some losses
    const MANUAL_PARTIAL_OK = "MANUAL_PARTIAL_OK";
    // Not ok and loosses
    const MANUAL_FAILURE = "MANUAL_FAILURE";
    // Not important (link to an other asset)
    const MANUAL_IGNORE = "MANUAL_IGNORE";
    
    
    static function getAllEventStatus() {
        return array(EventStatus::AUTO_SUCCESS, EventStatus::AUTO_SUCCESS_ERRORS, 
            EventStatus::AUTO_SUCCESS_WARNINGS, EventStatus::AUTO_FAILURE,
            EventStatus::MANUAL_OK, EventStatus::MANUAL_PARTIAL_OK,
            EventStatus::MANUAL_FAILURE, EventStatus::MANUAL_IGNORE);
    }
    
    static function getManualEventStatus() {
        return array(EventStatus::MANUAL_OK, EventStatus::MANUAL_PARTIAL_OK,
            EventStatus::MANUAL_FAILURE, EventStatus::MANUAL_IGNORE);
    }
    
    
    static function getColorStatus($statut) {
        switch(strtoupper($statut)) {
            case EventStatus::AUTO_SUCCESS:
            case EventStatus::MANUAL_OK:
                return "success";
                
            case EventStatus::AUTO_SUCCESS_ERRORS:
            case EventStatus::MANUAL_FAILURE:
                return "danger";
                
            case EventStatus::AUTO_SUCCESS_WARNINGS:
            case EventStatus::MANUAL_PARTIAL_OK:
                return "warning";
                
            case EventStatus::AUTO_FAILURE:
                return "alert";
                
                
            case EventStatus::MANUAL_IGNORE:
                return "default";
                
            default:
                return "";
                
        }
    }
    
    
}
