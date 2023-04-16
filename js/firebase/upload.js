


function userProfileUpload(event){
    
    const img_area = document.getElementById('account-pic');
    const upload_sect = document.getElementById('upload').files[0];

    // Confirm Pofile Picture
    if(upload_sect){
        // Create Preview
        img_area.src = URL.createObjectURL(upload_sect);
        img_area.style.background= `url( ${URL.createObjectURL(upload_sect)})`;
        img_area.style.backgroundRepeat = "no-repeat";
        img_area.style.backgroundSize = "cover";
        img_area.style.backgroundPosition = "center";
        

        // Same time push to database----------------------------------[NEED TO IMPLEMENT]
    }
    


    
}

function itemImUpload(event){
    const endPoint = "js/plugin/upload.php";
    const img_area = document.getElementById('item-pic');
    const upload_sect = document.getElementById('upload2').files[0];
    const upload_name = document.getElementById('uploadname');

    let formData = new FormData();
    formData.append("inpFile", upload_sect);
    fetch(endPoint, {method: "POST", body: formData}).catch(console.error());

    console.log(upload_sect.name);
    upload_name.value = upload_sect.name;
    // Confirm Pofile Picture
    if(upload_sect){
        // Create Preview
        img_area.src = URL.createObjectURL(upload_sect);
        console.log(img_area.src);
        img_area.style.background= `url( ${URL.createObjectURL(upload_sect)})`;
        img_area.style.backgroundRepeat = "no-repeat";
        img_area.style.backgroundSize = "cover";
        img_area.style.backgroundPosition = "center";
        

        // Same time push to database----------------------------------[NEED TO IMPLEMENT]
    }
    


    
}