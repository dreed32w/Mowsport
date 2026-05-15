function $(e){
    let b = document.querySelectorAll(e)
    
        
        
        b.hide = function(del){
            b.forEach(e =>{
                setTimeout(() => {
                    e.style.display = 'none'
                }, del);
            }) 
        }

        b.show = function(){
            b.forEach(e =>{
                e.style.display = "block"
            }) 
        }

        b.onclick = function(hb){
            b.forEach(e =>{
                e.onclick = hb
            }) 
        }

        
        b.css = function(styles){
            b.forEach(e => {
                e.setAttribute("style", styles);
            })
            
        }
        
        b.adds = function(cont,...eles){
            b.forEach(v => {
                eles.forEach(ele => {
                    let e = document.createElement(ele)
                    e.innerHTML = cont
                    v.append(e)
                });
            })
        }


        b.slideup = function(der){
            let style = document.createElement("style")
                    style.innerHTML = `@keyframes anime {
                    from { height: toggle;  }
                    to { height: 0; }
                    }`
                    document.body.append(style)
            b.forEach(v => {
                    
                    v.style.animation = `anime ${der}ms ease forwards`
                
            })
        }

        b.addclass = function(clas){
            b.forEach(v => {
                v.setAttribute("class", clas)
            })
        }

        b.html = function(text){
            b.forEach(v => {
                v.innerHTML = text
            })
        }
        
        b.attr = function(x){
            let len = arguments.length
            if(len == 2){
                alert("2")
            }
            else{
                if(typeof(x) == "object"){
                    let atrrubets = Object.entries(x);
                    
                    for(i=0; i<atrrubets.length; i+=2){
                        b.forEach(v => {
                            v.setAttribute(atrrubets[i], atrrubets[i+1])
                        
                        })
                    }
                        
                }
            }
            
            
        }

        

    
        
    
    return b;
}
        
    
    
            
    
    
    
    
    
