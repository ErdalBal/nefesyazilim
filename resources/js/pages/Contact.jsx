import React from 'react'
import Header from '../components/Header'
import Footer from '../components/Footer'
import '../../css/contact.css'
function Contact() {
    return (
        <>
            <Header />
            <div className="container-fluid about-container">
                <h1>İletişim</h1>
            </div>
 <div className="container-fluid">
            <div className="row">
                <h2 className='text-center mb-5 contact-title'>Sizin İçin Burdayız</h2>
            </div>

            <div className="row contact-card text-center d-flex justify-content-center mb-5">
                <div className="col-md-4">
                    <div className="card">
                        <i className="fa-solid fa-location-dot"></i>
                        <label>Adres</label>
                        <div className="card-body">
                            dsddds
                        </div>
                    </div>

                </div>

                <div className="col-md-4">
                    <div className="card">
                        <i class="fa-regular fa-clock"></i>
                        <label>Destek</label>
                        <div className="card-body">
                            dsddds
                        </div>
                    </div>

                </div>
                <div className="col-md-4">
                    <div className="card">
                        <i className="fa-solid fa-phone-volume"></i>
                        <label>Telefon</label>
                        <div className="card-body">
                            dsddds
                        </div>
                    </div>

                </div>


            </div>

            <div className="container-fluid contact-teklif mt-5">

                <div className="container contact-teklif-container">
                    <div className="col-md-12 text-center  mt-5 label">
                        <label className='text-white'>Bize Mesaj Gönderin</label>
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

                                <input type="text" className='form-control' placeholder='E-Telefon' />

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
             </div>
            <Footer />

        </>
    )
}

export default Contact
