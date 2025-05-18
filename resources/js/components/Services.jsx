import React from 'react'
import '../../css/services.css'
function Services() {
    return (
       
<>

<div className="container">
    <h1 className='text-center mt-5 header-service'>Hizmetler</h1>

    {/* <div className="card-container">
  <div className="card">
    <div className="card-face card-front">
      <h3>Ön Yüz</h3>
    </div>
    <div className="card-face card-back">
      <h3>Arka Yüz</h3>
    </div>
  </div>
</div> */}

    <div className="row  offset-md-2">
    <div className="col-4 card-container card-item">
        <div className="card border-primary mb-3" >
            
           
            <div className="card-body card-face card-front">
            <i className="fa-solid fa-desktop" style={{color: '#fcfcfc'}}></i>
           
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div className="card-body card-face card-back">
                <h3>Web Programlama</h3>
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
        </div>
    </div>
    <div className="col-4 card-container card-item">
        <div className="card border-primary mb-3" >
            
        <div className="card-body card-face card-front">
            <i className="fa-solid fa-mobile" style={{color: '#fcfcfc'}}></i>
            
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div className="card-body card-face card-back">
                <h3>Mobil Uygulama</h3>
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
        </div>
    </div>            
    <div className="col-4 card-container card-item">
        <div className="card border-primary mb-3" >
            
        <div className="card-body card-face card-front">
            <i className="fa-brands fa-internet-explorer" style={{color: '#fcfcfc'}}></i>
           
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div className="card-body card-face card-back">
                <h3>Kurumsal Site</h3>
            <p className="">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             </div>
        </div>
    </div>          
    
    </div> 
    {/* <div className="row  offset-md-1">
    <div className="col-4 card-item">
        <div className="card border-primary mb-3" >
            <div className="card-header">Header</div>
            <div className="card-body text-primary">
                <h5 className="card-title">Primary card title</h5>
                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
        </div>
    </div>
    <div className="col-4 card-item">
        <div className="card border-primary mb-3" >
            <div className="card-header">Header</div>
            <div className="card-body text-primary">
                <h5 className="card-title">Primary card title</h5>
                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
        </div>
    </div>            
    <div className="col-4 card-item">
        <div className="card border-primary mb-3" >
            <div className="card-header">Header</div>
            <div className="card-body text-primary">
                <h5 className="card-title">Primary card title</h5>
                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
        </div>
    </div>          
    
    </div>   */}




</div>
              
    </>   
       
    )
}

export default Services
