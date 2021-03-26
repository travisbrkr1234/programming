// BASE SETUP
// =============================================================================
// call the packages we need
var express = require('express');        // call express
var app = express();                 // define our app using express
var bodyParser = require('body-parser');
var mysql = require('mysql');
var commonUtils = require('./utilities.js').default;
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
router.get('/junkdoor', function (req, res) {
    var params = req.query;
    var a = params.firstname;
    var b = params.lastname;
    var c = params.email;
    res.json({ message: `hooray! welcome to our api ${contact} ${b} ${c} !` });
});
// What is happening here -------------------------------
// Comment out 34 to 63
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



router.post('/contestant', function (req, res) {
    let requestBody = req.body;
    let firstName = requestBody.firstName;
    let lastName = requestBody.lastName;
    let email = requestBody.email;
    let birthday = requestBody.birthday;
    let entryText = requestBody.entryText;
    // let dateCreated = new Date().toISOString().slice(0,10);

    if (firstName && lastName && email && entryText) {
        var sql = "INSERT INTO contestant (first_name, last_name, email, birthday, entry_text)" + "VALUES ('" + firstName + "', '" + lastName + "','" + email + "','" + birthday + "','" + entryText + "')";
        
        console.log(sql);

        connection.query(sql, function (err, result) {
            if (err) {
                console.error('failed to add: ' + err.stack);
                return;
            }
            console.log("1 record inserted");
            console.log(result.insertId);
            // res.end();
            res.statusCode = 200;
            res.json({ contactId: `${result.insertId}` });
        });
    } else {
        res.statusCode = 400;
        res.json({ message: "Error, please provide first name, last name, email, and entry text"})
    }
});



router.delete('/contestant', (req,res) => {
    let recordId = req.body.contestantId;

    commonUtils.checkThingBeingBlank('SHIT', recordId);
    commonUtils.checkIfStringEmptyAndSetToNumber(fieldName, recordId);

    let mysqlDelete = `DELETE FROM contestant WHERE id = ${recordId}`;
    connection.query(mysqlDelete, (error, result) => {
        if(error){
            res.status(400).json(error.sql);
        } 
        if(result.affectedRows === 0) {
            res.status(418);
            res.statusMessage = 'Id Not Found';
            res.json(`Id=${recordId} doesnt exist`);
        } else {
            res.status(200).json(`Contestant Id=${recordId} sucessfully deleted`);
        }
    });
    }
});
























 



















//((Discuss the correct order of if statements for memory usage))


// router.delete('/contestant', (req,res) => {
//     // what we need to pass to delete
//     let recordId = req.body.contestantId;
//     // drop contact record
//     let mysqlDelete = `DELETE FROM contestant WHERE id = ${recordId}`;
//     connection.query(mysqlDelete, (error, result) => {
//         //error loging
//         //Contestant id= nothing, empty
//          if(recordId === ''){
//             console.log('empty id');
//             res.status(404).json('Contestant Id must not be blank');
//          //receives an error
//         } else if(error){
//             console.log('Error response thrown ' + error.stack);
//             res.status(400).json(error.sql);
//         //Successfully deleted 1 row in the database    
//         } else if(result.affectedRows != 0) {
//             console.log("Successfully deleted id, Number of records deleted: " + result.affectedRows);
//             res.status(200).json('Contestant Id=' + `${recordId}` + ' sexessfully deleted');
//         //attempt delete id that doesnt exist
//         } else {
//             console.log("Id doesnt exist, Number of records deleted: " + result.affectedRows);
//             res.status(418);
//             res.statusMessage = 'Id Not Found';
//             res.json('Id=' + `${recordId}` + ' doesnt exist');
//         }
//     });
// });


//((Discuss the correct order of if statements for memory usage))
// router.delete('/contestant', (req,res) => {
//     // what we need to pass to delete
//     let recordId = req.body.contestantId;
//     // drop contact record
//     let mysqlDelete = `DELETE FROM contestant WHERE id = ${recordId}`;
//     connection.query(mysqlDelete, (error, result) => {
//     //error loging
//         if(error){
//             console.log('Could not delete record: ' + error.stack);
//             return;
//         } else if (result) {
//         res.statusCode = 200;
//         console.log(res.json({"Success": result.affectedRows + " rows deleted" }));
//         console.log("Success! Number of records deleted: " + result.affectedRows);
//     } else {
//         res.statusCode = 400;
//         res.json({message: "Bad request"});
//     }
//     });
//     //Response to end user (console or person)
// });

// more routes for our API will happen here
// REGISTER OUR ROUTES -------------------------------
// all of our routes will be prefixed with /api
app.use('/api', router);
// START THE SERVER
// =============================================================================
app.listen(port);
console.log('Serving on port ' + port);