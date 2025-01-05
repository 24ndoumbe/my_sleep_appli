<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SleepEntry Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\DateTime $sleep_start
 * @property \Cake\I18n\DateTime $sleep_end
 * @property bool $nap
 * @property int $feeling
 * @property string|null $comment
 *
 * @property \App\Model\Entity\User $user
 */
class SleepEntry extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'sleep_start' => true,
        'sleep_end' => true,
        'nap' => true,
        'feeling' => true,
        'comment' => true,
        'user' => true,
    ];
}
