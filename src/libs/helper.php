<?php
if (!defined('timeAgo')) {
    function timeAgo($datetime)
    {
        $timestamp = is_numeric($datetime) ? $datetime : strtotime($datetime);
        $diff = time() - $timestamp;
        
        if ($diff <0 ) {
            return "0 seconds ago";
        }else if ($diff < 60) {
            return $diff == 1 ? "1 second ago" : $diff . " seconds ago";
        } elseif ($diff < 3600) {
            $minutes = round($diff / 60);
            return $minutes == 1 ? "1 minute ago" : $minutes . " minutes ago";
        } elseif ($diff < 86400) {
            $hours = round($diff / 3600);
            return $hours == 1 ? "1 hour ago" : $hours . " hours ago";
        } elseif ($diff < 604800) { // 7 days
            $days = round($diff / 86400);
            return $days == 1 ? "1 day ago" : $days . " days ago";
        } elseif ($diff < 2592000) { // 30 days (approx. 1 month)
            $weeks = round($diff / 604800);
            return $weeks == 1 ? "1 week ago" : $weeks . " weeks ago";
        } elseif ($diff < 31536000) { // 365 days (approx. 1 year)
            $months = round($diff / 2592000);
            return $months == 1 ? "1 month ago" : $months . " months ago";
        } else {
            $years = round($diff / 31536000);
            return $years == 1 ? "1 year ago" : $years . " years ago";
        }
    }
}
