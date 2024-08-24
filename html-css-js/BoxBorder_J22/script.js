const box = document.getElementById("box");
const UD = document.getElementById("UD");
const LR = document.getElementById("LR");

function TopBottom(){
    
    if(document.getElementById('box').style.borderTopStyle == "hidden" ){
        document.getElementById('box').style.borderTopStyle = "solid";
        document.getElementById('box').style.borderBottomStyle = "solid";
    }else{
        document.getElementById('box').style.borderTopStyle = "hidden";
        document.getElementById('box').style.borderBottomStyle = "hidden";
    }
    
}

function LeftRight(){
    if(document.getElementById('box').style.borderLeftStyle == "hidden" ){
        document.getElementById('box').style.borderLeftStyle = "solid";
        document.getElementById('box').style.borderRightStyle = "solid";
    }else{
        document.getElementById('box').style.borderLeftStyle = "hidden";
        document.getElementById('box').style.borderRightStyle = "hidden";
    }
    
}