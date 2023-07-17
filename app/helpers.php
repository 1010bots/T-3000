<?php

namespace App;

class Helpers {
    /**
        * Utility function to check JavaScript licenses compatible with FreeJS,
        * see JavaScript License Web Labels (https://www.gnu.org/licenses/javascript-labels.html)
        * @param string $license The license idenfitier string
        * @return bool Boolean value
        */
    static function is_license_free(string $license): bool {
        return in_array($license, [
            'GNU-GPL-2.0-or-later',
            'GNU-GPL-3.0-or-later',
            'GNU-LGPL-2.1-or-later',
            'GNU-LGPL-3.0-or-later',
            'GNU-AGPL-3.0-or-later',
            'Apache-2.0-only',
            'Modified-BSD',
            'CC0-1.0-only',
            'Expat',
            'MPL-2.0-or-later',
        ]);
    }
}