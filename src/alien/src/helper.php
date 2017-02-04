<?php
function alien_types()
{
    return [
        'bio_sectoid',
        'mech_drone',
        'bio_thinman',
        'mech_seeker',
        'bio_outsider',
        'mech_floater',
        'bio_chryssalid',
        'bio_zombie',
        'bio_muton',
        'mech_cyberdisk',
        'mech_mechtoid',
        'bio_berserker',
        'bio_sectoidcommander',
        'mech_heavyfloater',
        'bio_mutonelite',
        'mech_sectopod',
        'bio_ethereal',
//        'exalt_operative',
//        'exalt_sniper',
//        'exalt_heavy',
//        'exalt_medic',
//        'exalt_eliteoperative',
//        'exalt_elitesniper',
//        'exalt_eliteheavy',
//        'exalt_elitemedic',
    ];
}

function get_alien_image($alien_type)
{
    return [
    'bio_sectoid' => 'http://ufopaedia.org/images/4/49/Sectoid_%28EU2012%29.png',
    'mech_drone' => 'http://ufopaedia.org/images/f/fa/Drone_1_%28EU2012%29.png',
    'bio_thinman' => 'http://ufopaedia.org/images/f/ff/Thin_Man_1_%28EU2012%29.png',
    'mech_seeker' => 'http://ufopaedia.org/images/e/ec/Seeker_%28EU2012%29.png',
    'bio_outsider' => 'http://ufopaedia.org/images/2/20/Outsider_%28EU2012%29.jpg',
    'mech_floater' => 'http://ufopaedia.org/images/5/58/Floater_1_%28EU2012%29.png',
    'bio_chryssalid' => 'http://ufopaedia.org/images/8/85/Chryssalid_1_%28EU2012%29.png',
    'bio_zombie' => 'http://ufopaedia.org/images/9/95/Zombie_1_%28EU2012%29.png',
    'bio_muton' => 'http://ufopaedia.org/images/0/0c/Muton_1_%28EU2012%29.png',
    'mech_cyberdisk' => 'http://ufopaedia.org/images/7/73/Cyberdisc_1_%28EU2012%29.png',
    'mech_mechtoid' => 'http://ufopaedia.org/images/a/a6/Mechtoid_%28EU2012%29.png',
    'bio_berserker' => 'http://ufopaedia.org/images/1/12/Berserker_%28EU2012%29.png',
    'bio_sectoidcommander' => 'http://ufopaedia.org/images/2/29/Sectoid_Commander_1_%28EU2012%29.png',
    'mech_heavyfloater' => 'http://ufopaedia.org/images/0/0b/Heavy_Floater_1_%28EU2012%29.png',
    'bio_mutonelite' => 'http://ufopaedia.org/images/5/58/Floater_1_%28EU2012%29.png',
    'mech_sectopod' => 'http://ufopaedia.org/images/b/b3/Sectopod_1_%28EU2012%29.png',
    'bio_ethereal' => 'http://ufopaedia.org/images/a/ab/Ethereal_%28EU2012%29.png',
    ][$alien_type];
//    return $alienImages[$alien_type];
}