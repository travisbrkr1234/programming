// BASE SETUP
// =============================================================================

// call the packages we need
var express    = require('express');        // call express
var app        = express();                 // define our app using express
var bodyParser = require('body-parser');
var mysql = require('mysql');

var connection = mysql.createConnection({
  host: '',
  user: '',
  password: '',
  database: ''
});

// configure app to use bodyParser()
// this will let us get the data from a POST
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());


// constructor
const Customer = function(customer) {
  this.firsName = customer.first_name;
  this.lastName = customer.last_name;
  this.email = customer.email;
};

var port = process.env.PORT || 8500;        // set our port

// ROUTES FOR OUR API
// =============================================================================
var router = express.Router();              // get an instance of the express Router

// test route to make sure everything is working (accessed at GET http://localhost:8500/api/junkdoor/)
router.get('/junkdoor', function(req, res) {
    var params = req.query; 
    var a = params.firstname;
    var b = params.lastname;
    var c = params.email;

    res.json({ message: `hooray! welcome to our api ${contact} ${b} ${c} !` });   
});

router.get('/contact', function(req, res) {
  var contact = "";
    connection.connect();
    connection.query('SELECT * FROM contact', function (err, rows, fields) {
    if (err) throw err
    console.log('The solution is: ', rows[0])
    // console.log(fields);
    contact = rows[0];
    // connection.end();
    });
   
    console.log(contact);

    res.json({ message: `hooray! welcome to our api ${contact.first_name}` });   
});

// more routes for our API will happen here

// REGISTER OUR ROUTES -------------------------------
// all of our routes will be prefixed with /api
app.use('/api', router);

// START THE SERVER
// =============================================================================
app.listen(port);
console.log('Serving on port ' + port);
