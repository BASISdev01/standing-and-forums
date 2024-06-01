<?php
/**
 * Mehedi Hasan Jarjis
 * Date: 15-Feb-24
 */

namespace App;

class AppConstant
{
    public static function getTypes(): array
    {
        return [
            'YES' => 'Member',
            'NO' => 'Member Alternative',
            'VIP' => 'VIP',
            'JOURNALIST' => "Journalist",
            'AMBASSADOR' => 'Ambassador',
            'GOVT' => 'Govt',
            'BANKS' => 'Banks',
            'ASSOCIATIONS' => 'Associations',
            'PAST_EC' => 'Past EC and Founding Member',
            'OTHER' => 'Other',
        ];
    }
}
