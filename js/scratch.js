// BASE SETUP
// =============================================================================

// call the packages we need
var express = require('express');        // call express
var app = express();                 // define our app using express
var bodyParser = require('body-parser');
var mysql = require('mysql');

// Create the database connection
// =============================================================================
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

var port = process.env.PORT || 8500;        // set our port

// ROUTES FOR OUR API
// =============================================================================
var router = express.Router();              // get an instance of the express Router

// test route to make sure everything is working (accessed at GET http://localhost:8500/api/junkdoor/)
router.
router.get('/junkdoor', function (request, res) {
    var params = req.query;
    var a = params.firstname;
    var b = params.lastname;
    var c = params.email;

    res.json({ message: `hooray! welcome to our api ${contact} ${b} ${c} !` });
});

// What is happening here -------------------------------
router.get('/contact', function (req, res) {
    console.log("==== running query ====")
    let id = req.query.id
    if (id) {
        connection.query(`SELECT * FROM contact WHERE id=${id}`, function (err, result, fields) {
            // if any error while executing above query, throw error
            if (err) {
                console.error('error connecting: ' + err.stack);
                return;
            }
            // if there is no error, you have the result
            let contact = result[0];
            if (contact) {
                console.log(contact.first_name);
                let contactFirstName = contact.first_name;
                let contactLastName = contact.last_name;
                if (contactFirstName && contactLastName) {
                    res.statusCode = 200;
                    res.json({ message: `hooray! welcome to our api ${contactFirstName} ${contactLastName}!` });
                }
            } else {
                res.statusCode = 400;
                res.json({ message: "no contact found" });
            }
        });
    } else {
        res.statusCode = 400;
        res.json({ message: "no contact id provided" });
    }
});

// What is happening here -------------------------------
router.post('/contact', function (req, res) {
    let firstName = req.body.firstName;
    let lastName = req.body.lastName;
    let email = req.body.email;

    if (firstName && lastName && email) {
        var sql = "INSERT INTO contact (first_name, last_name, email) VALUES ('" + firstName + "', '" + lastName + "','" + email + "')";
        connection.query(sql, function (err, result) {
            if (err) {
                console.error('failed to add: ' + err.stack);
                return;
            }
            console.log("1 record inserted");
            // res.end();
            res.statusCode = 200;
            res.json({ contactId: `${result.insertId}` });
        });
    }
});

// more routes for our API will happen here

// REGISTER OUR ROUTES -------------------------------
// all of our routes will be prefixed with /api
app.use('/api', router);

// START THE SERVER
// =============================================================================
app.listen(port);
console.log('Serving on port ' + port);