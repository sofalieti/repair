function jivo_onMessageSent() {
    jivo_api.getVisitorNumber(function(err, visitor_number){
        $.ajax({
            url: '/index.php?dispatch=jivosite.send_to_zoho_first_msg',
            data: {
                chat_id: visitor_number
            },
            method: 'post'
        });
    });
} 

function jivo_onIntroduction(){
    jivo_api.getVisitorNumber(function(err, visitor_number){
        var contacts = jivo_api.getContactInfo();
        $.ajax({
            url: '/index.php?dispatch=jivosite.send_to_zoho_contacts',
            data: {
                chat_id: visitor_number,
                client_name: contacts.client_name,
                email: contacts.email,
                phone: contacts.phone
            },
            method: 'post'
        });        
    });    
}