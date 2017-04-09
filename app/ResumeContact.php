<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeContact extends Model
{
    const TYPE_EMAIL = 0;
    const TYPE_PHONE = 1;
    const TYPE_GIT_HUB = 2;
    const TYPE_FACEBOOK = 3;
    const TYPE_VK = 4;

    public function getIconClassAttribute()
    {
        $icon = '';

        switch ($this->attributes['type']) {
            case self::TYPE_EMAIL:
                $icon = 'fa-envelope';
                break;
            case self::TYPE_PHONE:
                $icon = 'fa-phone';
                break;
            case self::TYPE_GIT_HUB:
                $icon = 'fa-github';
                break;
            case self::TYPE_FACEBOOK:
                $icon = 'fa-facebook';
                break;
            case self::TYPE_VK:
                $icon = 'fa-vk';
                break;
        }

        return $icon;
    }

    public function getHrefAttribute()
    {
        $contact = $this->attributes['contact'];
        $href = '';

        switch ($this->attributes['type']) {
            case self::TYPE_EMAIL:
                $href = 'mailto: ' . $contact;
                break;
            case self::TYPE_PHONE:
                $href = 'tel:' . $contact;
                break;
            case self::TYPE_GIT_HUB:
                $href = 'https://github.com/' . $contact;
                break;
            case self::TYPE_FACEBOOK:
                $href = 'https://www.facebook.com/' . $contact;
                break;
            case self::TYPE_VK:
                $href = 'https://vk.com/' . $contact;
                break;
        }

        return $href;
    }

    public function getShortHrefAttribute()
    {
        $contact = $this->attributes['contact'];
        $short_href = '';

        switch ($this->attributes['type']) {
            case self::TYPE_EMAIL:
            case self::TYPE_PHONE:
                $short_href = $contact;
                break;
            case self::TYPE_GIT_HUB:
                $short_href = 'github.com/' . $contact;
                break;
            case self::TYPE_FACEBOOK:
                $short_href = 'facebook.com/' . $contact;
                break;
            case self::TYPE_VK:
                $short_href = 'vk.com/' . $contact;
                break;
        }

        return $short_href;
    }
}