// Author:      Juraj Marusiak

// -------------------------------------------------
// Site assets
// -------------------------------------------------

// Nacitanie jQuery a WOW do global scope .. Predtym mi napr. nerozpoznalo WOW.ini() volanie, napriek tomu, ze som
// mal definovany require: require('../../../../node_modules/wow.js/dist/wow.js');
require('expose?$!expose?jQuery!jquery');
require('expose?$!expose?WOW!wow.js');

require('../../../../node_modules/wow.js/dist/wow.js');
require('../../../../node_modules/bootstrap/dist/css/bootstrap.min.css');
require('../../../../node_modules/font-awesome/css/font-awesome.min.css');
require('../scss/style.scss');
require('../images/coding-welcome.png');
require('../images/profilovka.jpg');
require('../images/pdf.png');
require('../images/grow.png');
require('../js/script.js');