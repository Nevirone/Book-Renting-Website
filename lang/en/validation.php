<?php

return array(
	"accepted"             => ":attribute must be accepted.",
	"active_url"           => ":attribute is not correct URL address.",
	"after"                => ":attribute must be date later than :date.",
	"alpha"                => ":attribute can only conatin letters.",
	"alpha_dash"           => ":attribute can only conatin letters, numbers and underline.",
	"alpha_num"            => ":attribute can only conatin letters, numbers.",
	"array"                => ":attribute must be an array.",
	"before"               => ":attribute must be date earlier than :date.",
	"between"              => array(
		"numeric" => ":attribute must be a value between :min and :max.",
		"file"    => ":attribute must be between :min and :max kilobytes.",
		"string"  => ":attribute must be between :min and :max signs.",
		"array"   => ":attribute must be between :min and :max position.",
	),
	"boolean"              => "field :attribute must be true or false",
	"confirmed"            => ":attribute confirmation does not match.",
	"date"                 => ":attribute is not a correct date.",
	"date_format"          => ":attribute does not match a :format format.",
	"different"            => ":attribute and :other must be different.",
	"digits"               => ":attribute must have :digits numbers.",
	"digits_between"       => ":attribute must have between :min and :max numbers.",
	"email"                => ":attribute must be a valid email address.",
	"exists"               => "selected :attribute is incorrect.",
	"image"                => ":attribute must be an image.",
	"in"                   => "selected :attribute is incorrect.",
	"integer"              => ":attribute must be an integer.",
	"ip"                   => ":attribute must be a correct IP address.",
	"max"                  => array(
		"numeric" => ":attribute can't be bigger than :max.",
		"file"    => ":attribute can't be bigger than :max kilobytes.",
		"string"  => ":attribute can't be longer than :max signs.",
		"array"   => ":attribute can't have more than :max positions.",
	),
	"mimes"                => ":attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => ":attribute must be bigger or equal to :min.",
		"file"    => ":attribute must have at least :min kilobytes.",
		"string"  => ":attribute must have at least :min signs.",
		"array"   => ":attribute must have at least :min positions.",
	),
	"not_in"               => "selected :attribute is incorrect.",
	"numeric"              => ":attribute must be a number.",
	"regex"                => "format :attribute is incorrect",
	"required"             => "field :attribute is required.",
	"required_if"          => "field :attribute is required, when :other has value :value.",
	"required_with"        => "field :attribute is required, when :values are defined.",
	"required_with_all"    => "field :attribute is required, when :values are defined.",
	"required_without"     => "field :attribute is required, when :values are not defined.",
	"required_without_all" => "field :attribute is required, when none of :values are defined.",
	"same"                 => ":attribute and :other must be the same.",
	"size"                 => array(
		"numeric" => ":attribute must be :size.",
		"file"    => ":attribute must have :size kilobytes.",
		"string"  => ":attribute must have :size signs.",
		"array"   => ":attribute must conatin :size positions.",
	),
	"unique"               => ":attribute is already taken.",
	"url"                  => "format :attribute is incorrect.",
	"timezone"             => ":attribute must be a correct time zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'username' => 'user name'
	),

);