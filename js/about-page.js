document.querySelectorAll('.accord-button').forEach((el) => {
    
    el.addEventListener('click', () => {
        let content = el.nextElementSibling;

        if(content.style.maxHeight){
            document.querySelectorAll('.acc-cont').forEach((el) => el.style.maxHeight = null);
            let txt = el.innerHTML;
            el.innerHTML = txt.replace("-", "+");
        }
        else{
            document.querySelectorAll('.accord-button').forEach((el2) => {
                let txt = el2.innerHTML;
                el2.innerHTML = txt.replace("-", "+");
            })
            document.querySelectorAll('.acc-cont').forEach((el) => el.style.maxHeight = null);
            content.style.maxHeight = content.scrollHeight + 'px';
            let txt = el.innerHTML;
            el.innerHTML = txt.replace("+", "-");
            
        }
    })
})