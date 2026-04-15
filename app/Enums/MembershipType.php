<?php

namespace App\Enums;

enum MembershipType: string
{
    case Ogrenci = 'ogrenci';
    case Emekli = 'emekli';
    case Yetiskin = 'yetiskin';
    case Diger = 'diger';
}
