<?php

namespace Kingscode\EnormailApi\Endpoints;

class Contacts extends AbstractEndpoint
{
    /**
     * Adds a contact to the list
     *
     * @access public
     * @param  string     $listid                 the unique listid string
     * @param  string     $name                   the contact's name
     * @param  string     $email                  the contact's e-mail address
     * @param  array|null $fields                 an array with optional fields, example: array('lastname' => 'Contact
     *                                            lastname', 'city' => 'City name')
     * @param  array|null $tags                   an array with optional tags
     * @param  integer    $activate_autoresponder a flag to activate the autoresponder when the contact is added (1 or
     *                                            0, default 1)
     * @return string results (json|xml)
     */
    public function add(
        $listid,
        $name,
        $email,
        array $fields = null,
        array $tags = null,
        $activate_autoresponder = 1
    ) {
        return $this->client->getHttp()->post(sprintf("/contacts/%s.%s", $listid,$this->client->getFormat()), [
            'name'                   => $name,
            'email'                  => $email,
            'tags'                   => $tags,
            'fields'                 => $fields,
            'activate_autoresponder' => $activate_autoresponder,
        ]);
    }

    /**
     * Update a contact of the list
     *
     * @access public
     * @param  string     $listid                 the unique listid string
     * @param  string     $email                  the contact's e-mail address
     * @param  string|null     $name                   the contact's name
     * @param  array|null $fields                 an array with optional fields, example: array('lastname' => 'Contact
     *                                            lastname', 'city' => 'City name')
     * @param  array|null $tags                   an array with optional tags
     * @param  integer    $activate_autoresponder a flag to activate the autoresponder when the contact is added (1 or
     *                                            0, default 1)
     * @return string results (json|xml)
     */
    public function update(
        $listid,
        $email,
        ?string $name = null,
        array $fields = null,
        array $tags = null,
        $activate_autoresponder = 1
    ) {

        $paramaters = ['activate_autoresponder' => $activate_autoresponder];
        if($name){
            $paramaters['name'] = $name;
        }
        if($fields){
            $paramaters['fields'] = $fields;
        }
        if($tags){
            $paramaters['tags'] = $tags;
        }

        return $this->client->getHttp()->put(sprintf("/contacts/%s.%s?email=%s", $listid,$this->client->getFormat(), $email),
            array_filter($paramaters)
        );
    }

}
