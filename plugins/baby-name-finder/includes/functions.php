<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	
	


	
	

	
	function restrict_by_first_letter( $where, $qry ) {
		global $wpdb;
		$sub = $qry->get('startswith');
		if (!empty($sub)) 
		{
			$where .= $wpdb->prepare(
				" AND SUBSTRING( {$wpdb->posts}.post_title, 1, 1 ) = %s ",
				$sub
			);
		}
		return $where;
	}
	add_filter( 'posts_where' , 'restrict_by_first_letter', 1 , 2 );
	
	





	function baby_nf_get_date()
		{	
			$gmt_offset = get_option('gmt_offset');
			$wpls_datetime = date('Y-m-d', strtotime('+'.$gmt_offset.' hour'));
			
			return $wpls_datetime;
		
		}



add_filter('baby_nf_filter_origin_list', 'baby_nf_filter_origin_list',10,3);
	function baby_nf_filter_origin_list() {
		$baby_nf_meta_origin_list = array(
			''=>'Select Origin',
			'african' => 'African',
			'akan' => 'Akan',
			'american' => 'American',
			'anglo-welsh' => 'Anglo Welsh',
			'arabic' => 'Arabic',
			'aramaic' => 'Aramaic',
			'armenian' => 'Armenian',
			'assyrian' => 'Assyrian',
			'australian' => 'Australian',
			'babylonian' => 'Babylonian',
			'basque' => 'Basque',
			'bulgarian' => 'Bulgarian',
			'cambodian' => 'Cambodian',
			'celtic' => 'Celtic',
			'cherokee' => 'Cherokee',
			'chinese' => 'Chinese',
			'contemporary' => 'Contemporary',
			'cornish' => 'Cornish',
			'czechoslovakian' => 'Czechoslovakian',
			'danish' => 'Danish',
			'dutch' => 'Dutch',
			'egyptian' => 'Egyptian',
			'english' => 'English',
			'farsi' => 'Farsi',
			'finnish' => 'Finnish',
			'flemish' => 'Flemish',
			'french' => 'French',
			'gaelic' => 'Gaelic',
			'german' => 'German',
			'ghanaian' => 'Ghanaian',
			'greek' => 'Greek',
			'hausa' => 'Hausa',
			'hawaiian' => 'Hawaiian',
			'hebrew' => 'Hebrew',
			'hindi' => 'Hindi',
			'hopi' => 'Hopi',
			'hungarian' => 'Hungarian',
			'indian' => 'Indian',
			'indo-pakastini' => 'Indo Pakastini',
			'irish' => 'Irish',
			'israeli' => 'Israeli',
			'italian' => 'Italian',
			'japanese' => 'Japanese',
			'kiswahili' => 'Kiswahili',
			'latin' => 'Latin',
			'mexican' => 'Mexican',
			'modern' => 'Modern',
			'native-american-indian' => 'Native American Indian',
			'nigerian' => 'Nigerian',
			'norman' => 'Norman',
			'norman-french' => 'Norman French',
			'norse' => 'Norse',
			'norwegian' => 'Norwegian',
			'pawnee' => 'Pawnee',
			'persian' => 'Persian',
			'phoenician' => 'Phoenician',
			'polish' => 'Polish',
			'portuguese' => 'Portuguese',
			'romany' => 'Romany',
			'russian' => 'Russian',
			'samoan' => 'Samoan',
			'sanskrit' => 'Sanskrit',
			'scandinavian' => 'Scandinavian',
			'scottish' => 'Scottish',
			'sioux' => 'Sioux',
			'slavic' => 'Slavic',
			'spanish' => 'Spanish',
			'swahili' => 'Swahili',
			'swedish' => 'Swedish',
			'tamil' => 'Tamil',
			'teutonic' => 'Teutonic',
			'turkish' => 'Turkish',
			'vietnamese' => 'Vietnamese',
			'welsh' => 'Welsh',
			'yiddish' => 'Yiddish',
			'zulu' => 'Zulu'
		);

		return $baby_nf_meta_origin_list;
	}
	
	add_filter('baby_nf_filter_country_list', 'baby_nf_filter_country_list',10,3);
	function baby_nf_filter_country_list() {
		$baby_nf_nationality_list = array(
			''=>'Select Country',
			'AF' => 'Afghanistan',
			'AX' => 'Ãland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BQ' => 'Bonaire',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => 'CÃ´te dIvoire',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CW' => 'CuraÃ§ao',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'VA' => 'Holy See',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KR' => 'Korea',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Lao Peoples Democratic Republic',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'MD' => 'Moldova, Republic of',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'RÃ©union',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'BL' => 'Saint BarthÃ©lemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SX' => 'Sint Maarten',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia',
			'SS' => 'South Sudan',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Viet Nam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe'
		);
		return $baby_nf_nationality_list;
	}
	
	
	add_filter('baby_nf_filter_religious_list', 'baby_nf_filter_religious_list',10,3);
	function baby_nf_filter_religious_list() {
		$baby_nf_religious_list = array(
			''=>'Select Religion',
			'islam'=>'Islam',
			'hinduism'=>'Hinduism',
			'christians'=>'Christians',
			'buddhist'=>'Buddhist',
			'other'=>'Other',
		);
		return $baby_nf_religious_list;
	}




















