/*=============JsGrid Basic Scenario Table==========================*/
<?php
// connecting to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "hs";

// create a connection
$conn = mysqli_connect($server, $username, $password, $database);
// Die if connecton was not successful
if (!$conn) {
    die("Sorry! We failed to connect: " . mysqli_connect_error());
} else {
    // echo "connection was successfucdcl<br>";
}
?>
<?php
// include '../../../db/dbconnect.php';
$sql = "SELECT sp.* , city.*
FROM sp INNER JOIN city 
ON sp.city_id=city.city_id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        $sp_id = $row['sp_id'];
        $sp_name = $row['sp_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $city = $row['city_name'];
        $pincode = $row['pincode'];

        echo '

var clients = [
    { "Name": "' . $sp_name . '", "City":"' . $phone . '", "Country": 1, "Address": "' . $email . '", "Married": false },
    { "Name": "' . $sp_name . '", "City":"' . $phone . '", "Country": 1, "Address": "' . $email . '", "Married": false }

];


';
    }
}

echo '

var city = [
    { Name: "", Id: 0 },
    { Name: "United States", Id: 1 },
    { Name: "Canada", Id: 2 },
    { Name: "United Kingdom", Id: 3 }
];

$("#jsGrid").jsGrid({
    width: "100%",
    height: "500px",
    
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    
    data: clients,
    
    fields: [
        { name: "Name", type: "text", width: 150, validate: "required" },
        { name: "City", type: "number", width: 100 },
        { name: "Address", type: "text", width: 200 },
        { name: "Country", type: "select", items: city, valueField: "Id", textField: "Name" },
        { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
        { type: "control" }
    ]
});


'

/*============JsGrid Basic Scenario Table==========================*/






// /*===========JsGrid sorting Table ================================*/

// $("#jsGrid2").jsGrid({
//     height: "500px",
//     width: "100%",

//     autoload: true,
//     selecting: false,

//     //controller: db,
//     data: clients,

//     fields: [
//         { name: "Name", type: "text", width: 150, validate: "required" },
//         { name: "Age", type: "number", width: 50 },
//         { name: "Address", type: "text", width: 200 },
//         { name: "Country", type: "select", items: city, valueField: "Id", textField: "Name" },
//         { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
//         { type: "control" }
//         ]
//     });


// $("#sort").click(function() {
//     var field = $("#sortingField").val();
//     $("#jsGrid2").jsGrid("sort", field);
// });
// /*===========JsGrid sorting Table ================================*/


// /*===========JsGrid field Validation ================================*/

// $("#jsGrid3").jsGrid({
//     height: "500px",
//     width: "100%",
//     filtering: true,
//     editing: true,
//     inserting: true,
//     sorting: true,
//     paging: true,
//     autoload: true,
//     pageSize: 15,
//     pageButtonCount: 5,
//     deleteConfirm: "Do you really want to delete the client?",

//     //controller: db,
//     data: clients,

//     fields: [
//         { name: "Name", type: "text", width: 150, validate: "required" },
//         { name: "Age", type: "number", width: 50, validate: { validator: "range", param: [18, 80] } },
//         { name: "Address", type: "text", width: 200, validate: { validator: "rangeLength", param: [10, 250] } },
//         { name: "Country", type: "select", items: city, valueField: "Id", textField: "Name",
//             validate: { message: "Country should be specified", validator: function(value) { return value > 0; } } },
//         { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
//         { type: "control" }
//         ]
//     });

//     /*===========JsGrid field Validation ================================*/



?>