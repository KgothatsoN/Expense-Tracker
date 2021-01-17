
$(".btnedit").click(e =>{
    let textvalues = displayData(e);

    let id = $("input[name*='item_id']");
    let item = $("input[name*='item_name']");
    let price = $("input[name*='price']");
    let date = $("input[name*='date']");

    id.val(textvalues[0]);
    item.val(textvalues[1]);
    price.val(textvalues[2].replace("£",""));
    date.val(textvalues[3]);
});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}