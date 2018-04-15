const puppeteer = require('puppeteer');
const schedule = require('node-schedule');
const baseurl = "http://127.0.0.1/";

async function start(){
    browser = await puppeteer.launch({args: ['--no-sandbox']});
    page = await browser.newPage();
    await page.setCookie({
        'name' : 'flag',
        'value' : 'flag{bAsiC_X5s}',
        "url" : baseurl
    });
    page.on('dialog', async dialog => {
        await dialog.dismiss();
    });
}

async function bot(){
    let response = await page.goto(baseurl+"json.php");
    let json = await response.json();
    console.log("json : "+json);
    for(let id of json){
        try{
            await page.goto(baseurl+"text.php?id="+id, {waitUntil:"domcontentloaded"});
            await page.waitFor(500);
            // let content = await page.content();
            // console.log(content);
        } catch(e) {
            // console.log("-------------------"+id+"---------------");
            // console.log(e);
        }
    }
    await page.goto("about:blank");
};

( () => {
    start();
    setTimeout(function(){console.log("start");}, 1000);
    var rule = new schedule.RecurrenceRule();
    rule.second = [0,10,20,30,40,50];
    schedule.scheduleJob(rule, function(){
        bot();
    });
})();
