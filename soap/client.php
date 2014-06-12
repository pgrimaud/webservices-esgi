<?php
class EsgiSoapClient
{

    public $client;

    public function __construct()
    {
        require_once 'lib/nusoap.php';
        require_once 'lib/config.php';

        $namespace = URL_WS_SOAP;
        $this->client = new nusoap_client(URL_WS_SOAP."?wsdl");
    }


    /**
     * Add a review to an area
     *
     * @param   int      $id_area Area's id which is reviewed
     * @param   string   $author  The name of the author
     * @param   string   $content  The content of the review
     * @param   int      $rate  The rate of the area, 1-10
     * @return  array    The new review created with all his values
     */
    public function AddReview($id_area, $author, $content, $rate)
    {
        if($id_area == "") {
            return 'The area id is mandatory!';
        }
        if($author == "") {
            return 'The author is mandatory!';
        }
        if($content == "") {
            return 'The content is mandatory!';
        }
        if($rate < 1 || $rate > 10) {
            return 'The rate value must be between 1 and 10!';
        }

        $err = $this->client->getError();
        if ($err) {
            return $err;
        }

        $result = $this->client->call(
            "AddReview",
            array(
                'id_area'   => $id_area,
                'author'    => $author,
                'content'   => $content,
                'rate'      => $rate
            )
        );

        return $result;
    }


    /**
     * Get all reviews of an area
     *
     * @param   int     $id_area Area's id which is reviewed
     * @return  array   All reviews created with all his values of an area
     */
    public function GetReviews($id_area)
    {
        $err = $this->client->getError();
        if ($err) {
            return $err;
        }

        $result = $this->client->call(
            "GetReviews",
            array("id_area" => $id_area)
        );

        return $result;
    }
}
