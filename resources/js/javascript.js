(function(win,doc){
    'use strict';
    function confirmDel(event){
        event.preventDefault();
       // console.log(event.target);
       if(confirm("Quer apagar?")){
           console.log("apagou");
       }else{
           return false;
       }
    }

    if(doc.querySelector('.jsdel')){
        
        let btn = doc.querySelectorAll('.jsdel');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click',confirmDel,false);
        }

    }


})(window,document);