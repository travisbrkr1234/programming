function checkThingBeingBlank(fieldName, thingIamChecking) => {
    if (thingIamChecking === '') {
        console.log('I did infact run');
        res.status(401).json(`${fieldName}  must not be blank!`);
        return;
    }
}

function checkIfStringEmptyAndSetToNumber(fieldName, recordId) {
    if (isNaN(recordId)) {
        res.status(400).json(`${fieldName} must be a String`);
        return;
    } else {
        recordId = Number(recordId);
    }
}