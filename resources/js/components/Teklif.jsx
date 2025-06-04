import React from 'react'
import '../../css/teklif.css'
function Teklif() {
    return (
        <>
            <div className="container-fluid teklif mt-5">

                <div  className="container teklif-container">
                     <div className="col-md-12 text-center  mt-5 label">
                            <label className='text-white' htmlFor="">Teklif Al</label>
                        </div>
                    <div className="row text-center">
                       
                        <div className="col-md-6 col-xs-12">
                            <div className="form-group">

                                <input type="text" className="form-control" placeholder='İsim' />

                            </div>
                        </div>
                        <div className="col-md-6 col-xs-12">
                            <div className="form-group">

                                <input type="text" className='form-control' placeholder='E-Posta' />

                            </div>
                        </div>

                    </div>

                    <div className="row">
                        <div className="col-md-6 col-xs-12">
                            <div className="form-group">

                                <input type="text" className="form-control" placeholder='Konu' />

                            </div>
                        </div>
                        <div className="col-md-6 col-xs-12">
                            <div className="form-group">

                                <input type="text" className='form-control' placeholder='E-Telefon'/>

                            </div>
                        </div>

                    </div>

                     <div className="row">
                        <div className="col-md-12">
                            <div className="form-group">

                              <textarea name="" className='form-control' placeholder='Mesaj' rows={5} id=""></textarea>

                            </div>
                        </div>
                        

                    </div>

                </div>
            </div>
        </>
    )
}

export default Teklif
