//init_debug(); //init

init_rule(); //init

//var debugArgs = '';

// function init_debug() {
//     currentURL = new URL(window.location.href);
//     params = new URLSearchParams(currentURL.search);
//     for ([key, value] of params.entries()) {
//         if (key == 'DEBUG_MODE' && (value == 'yes' || value == 'YES')) {
//             debugArgs = '&DEBUG_MODE=yes';
//             break;
//         } else if (key == 'DEBUG_VIEW' && (value == 'yes' || value == 'YES')) {
//             debugArgs = '&DEBUG_INFO=yes';
//             break;
//         }
//     }
// }
var rule;

function init_rule() {
    rule = {
        ajaxFlow: [],
        popUp: {
            alertBox: {
                active: false,
                text: null,
            },
            confirmBox: {
                active: false,
                text: null
            }
        },
        makeAction: function() {
            if (this.popUp.alertBox.active) {
                if (this.popUp.alertBox.text == null || (this.popUp.alertBox.text).length == 0) {
                    console.log('Empty alert popup used in commonAjaxRule');
                } else {
                    this.ajaxFlow.push('alert')
                }
            }
            if (this.popUp.confirmBox.active) {
                if (this.popUp.confirmBox.text == null || (this.popUp.confirmBox.text).length == 0) {
                    console.log('Empty confirm popup used in commonAjaxRule')
                } else {
                    this.ajaxFlow.push('confirm')
                }
            }
            return rule;
        }
    }
}

function sendFormData(displayMsg, form, callback) {
    ruleRes = rule.makeAction();
    if (ruleRes.ajaxFlow.length !== 0) {
        if (ruleRes.ajaxFlow == 'confirm' && ruleRes.ajaxFlow.length == 1) {
            if (confirm(ruleRes.popUp.confirmBox.text)) { //IF CONFIRM
                d = sendData(displayMsg, form, callback);
                rule.ajaxFlow = [];
                return d;
            }
        }
        if (ruleRes.ajaxFlow == 'alert' && ruleRes.ajaxFlow.length == 1) { //IF ALERT
            d = sendData(displayMsg, form, callback);
            rule.ajaxFlow = [];
            alert(ruleRes.popUp.alertBox.text);
            return d;
        }
        if (ruleRes.ajaxFlow.length == 2) {
            if (confirm(ruleRes.popUp.confirmBox.text)) { //IF CONFIRM AND ALERT
                d = sendData(displayMsg, form, callback);
                rule.ajaxFlow = [];
                alert(ruleRes.popUp.alertBox.text);
                return d;
            }
        }
        rule.ajaxFlow = [];
    } else {
        return sendData(displayMsg, form, callback);
    }


}

function sendData(displayMsg, form, callback) {
    if (!$(form).attr('action')) { //Checking action url is SET or NOT
        reqUrlStatus = false;
    } else {
        if ($(form).attr('action').trim().length == 0) {
            reqUrlStatus = false;
        } else {
            reqUrl = $(form).attr('action');
            reqUrlStatus = true;
        }
    }

    if (!$(form).attr('method')) { //Checking action method is SET or NOT
        reqType = 'post';
        reqMethodStatus = true;
    } else {
        if ($(form).attr('method').trim().length == 0) {
            reqMethodStatus = false;
        } else {
            reqType = $(form).attr('method');
            reqMethodStatus = true;
        }
    }

    if (reqUrlStatus && reqMethodStatus) {
        return performAjx(reqUrl, reqType, $(form).serialize(), callback);
    } else {
        alert('Please check form attributes rules:\n\n(method - OPTIONAL(default-POST) but don\'t use empty params))\n\n(action - REQUIRED.)')
    }
}

function performAjx(reqUrl, reqType, datas = '', callback) {
    return $.ajax({
        url: reqUrl,
        type: reqType,
        data: datas,
        success: function(e) {
            return JSON.parse(e);
            //           responseHandler('', res);FOR AUTO HANDLE
        }
    }).done(callback);
}


function responseHandler(displayMsg = '', res) {
    //CHECK DEBUGING MODE
    if (typeof res.DEBUG_STATUS !== 'undefined') {
        //console.log('TRUE');
        document.write("<table border='1'><tr><th>Data Field</th><th>Data</th></tr><tr><td>DEBUG_VIEW</td><td>true</td></tr><tr><td>DEBUG_MSG</td><td>" + res.DEBUG_MSG + "</td></tr><tr><td>Query Status</td><td>" + res.DEBUG_QUERY_STATUS + "</td></tr><tr><td>Query</td><td>" + res.DEBUG_QUERY + "</td></tr></table>");
    }

    //CHECKING RESPONSE STATUS
    //    $('input,select,textarea').css('border', '1px solid #555a');
    if (res.status == "success" || res.status == true) {
        if (displayMsg !== '') {
            $(displayMsg).text('success').css('color', 'green');
        }
    } else {
        if (typeof res.attr !== 'undefined') {
            if (displayMsg !== '') {
                $(displayMsg).text(res.msg).css('color', 'red');
            }
            $("[name*='" + res.attr + "']").css('border', '1px solid red').focus();
        } else {
            if (displayMsg !== '') {
                $(displayMsg).text(res.msg).css('color', 'red');
            }
        }
    }
}
