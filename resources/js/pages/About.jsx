import React from 'react'
import '../../css/about.css'
import Header from '../components/Header'
import Footer from '../components/Footer'

function About() {
    return (
        <>
            <Header />

            <div className="container-fluid about-container">
                <h1>Hakkımızda</h1>
            </div>

            <div className="container  hakkinda mb-5">
                <div className="row">
                    <div className="col-md-6">
                        <h3 className='banner'>Nefes Yazılım Hakkında</h3>
                        <p className='mt-5'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem molestiae, quis omnis quo nostrum ad reiciendis fugit pariatur vel eligendi nihil ex, commodi, nemo deserunt. Adipisci blanditiis voluptatem consequuntur eveniet.</p>
                        {/* <small className='animate'></small> */}

                        <div className="col-12 mt-5 mb-3 outhor">
                            <img src="/images/crypto-blog-img1-100x100.jpg" alt="" />
                            <span className='outhor-item'>Erdal Bal</span>
                            <span className='outhor-title-item'>CEO</span>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <img src="/images/about-new.png" alt="" />
                    </div>
                </div>

                <div className="row mt-5 mb-5 hakkinda-body" style={{ display: 'flex', justifyContent: 'space-around' }}>
                    <div className="col-4">
                        <div className="card" style={{ width: 380, height: 320 }}>
                            <div className="card-body">
                                <h5 className="card-title text-center mt-5"><i className="fa-regular fa-thumbs-up"></i></h5>
                                <h6 className="card-subtitle text-center mt-3 mb-5 text-muted">Güvenilir Hizmet</h6>
                                <p className="card-text">Çarpıcı web tasarımı ve son teknoloji geliştirme ile çevrimiçi varlığınızı dönüştürün ve ziyaretçileri her zaman sadık müşterilere dönüştürürün.</p>
                                 
                            </div>
                            <div class="card-bg"></div>
                        </div>
                    </div>
                    <div className="col-4">
                        <div className="card" style={{ width: 380, height: 320 }}>
                            <div className="card-body">
                                <h5 className="card-title  text-center mt-5"><i className="fa-solid fa-headset"></i></h5>
                                <h6 className="card-subtitle text-center mt-3 mb-5 text-muted">7 / 24 Destek</h6>
                                <p className="card-text">Yedi yirmidört her zaman desteğimizle yanınızdayız.</p>
                                
                            </div>
                             <div class="card-bg"></div>
                        </div>
                    </div>
                    <div className="col-4">
                        <div className="card" style={{ width: 380, height: 320 }}>
                            <div className="card-body">
                                <h5 className="card-title  text-center mt-5"><i className="fa-solid fa-users-gear"></i></h5>
                                <h6 className="card-subtitle text-center mt-3 mb-5 text-muted">Uzman & Profesyonel</h6>
                                <p className="card-text">Profesyonel bir şekilde isteklerinizin karşılandığını görüceksiniz.</p>
                               
                            </div>
                             <div className="card-bg"></div>
                        </div>
                    </div>
                </div>
            </div>

            <Footer />

        </>
    )
}

export default About
