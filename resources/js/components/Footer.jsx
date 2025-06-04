import React from 'react'
import '../../css/footer.css'
function Footer() {
    return (
        <>

            <div className="container container-main container-fluid">
                <div className="container footer-container">
                    <div className="row">
                        <div className="col-md-3 col-xs-12">
                            <ul>
                                <li className='footer-logo'>
                                    <img src="/images/crawft-logo2.png" alt="" />

                                </li>
                                <li>
                                    <p className='footer-text'>Completely strategize client-cent Phosfluorescently iterate efficient internal or organic.</p>
                                </li>

                                <li className='footer-icon'>
                                    <label className='fs-5 mt-3 footer-icon-title' htmlFor="">Bizi Takip Et</label>
                                    <div className='d-flex mt-5'>
                                        <div className='social-icon'>
                                            <a href="#">
                                                <i className="fa-brands fa-facebook"></i>
                                            </a>


                                        </div>
                                        <div className='social-icon'>
                                            <a href="#">
                                                <i className="fa-brands fa-instagram"></i>
                                            </a>
                                        </div>
                                        <div className='social-icon'>
                                            <a href="#">
                                                <i className="fab fa-x-twitter"></i>
                                            </a>
                                        </div>
                                        <div className='social-icon'>
                                            <a href="#">
                                                <i className="fa-brands fa-pinterest"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div className="col-md-2 col-xs-12">
                            <label className='fs-5 fw-bold mt-3 footer-icon-title' htmlFor="">Hızlı Linkler</label>
                            <ul className='mt-3'>
                                <li className='quick-link'>
                                    <a className='footer-text' href="#">
                                        <i className="fa-solid fa-arrow-right"></i> <span className='span-title'> Anasayfa</span>
                                    </a>
                                </li>
                                <li className='quick-link'>
                                    <a href="#">
                                        <i className="fa-solid fa-arrow-right"></i><span className='span-title'> Hakkımızda</span>
                                    </a>
                                </li>
                                <li className='quick-link'>
                                    <a href="#">
                                        <i className="fa-solid fa-arrow-right"></i><span className='span-title'> Hizmetler</span>
                                    </a>
                                </li>
                                <li className='quick-link'>
                                    <a href="#">
                                        <i className="fa-solid fa-arrow-right"></i><span className='span-title'> İletişim</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-md-3 col-xs-12">
                            <ul>
                                <label className='fs-5 fw-bold mt-3 footer-icon-title' htmlFor="">Son Gönderiler</label>
                                <li className='footer-post mt-3'>
                                    <img className='footer-post-img' src="/images/crypto-blog-img1-100x100.jpg" alt="" />
                                    <div className='footer-icon-slogan'>
                                        <p className='footer-icon-text'>Completely strategize  Phosfluorescently</p>
                                        <p className='text-icon-muted'>15-05-2025</p>
                                    </div>

                                </li>
                                <hr className='mt-3 mb-3' />
                                <li className='footer-post mt-3'>
                                    <img className='footer-post-img' src="/images/crypto-blog-img3-100x100.jpg" alt="" />
                                    <div className='footer-icon-slogan'>
                                        <p className='footer-icon-text'>Completely strategize  Phosfluorescently</p>
                                        <p className='text-icon-muted'>15-05-2025</p>
                                    </div>
                                </li>
                                <hr className='mt-3 mb-3' />


                            </ul>
                        </div>
                        <div className="col-md-4 contact col-xs-12 text-center">
                            <ul>
                                <label className='fs-5 fw-bold mt-3 footer-icon-title' htmlFor="">İletişim</label>

                                <li className='contact-icon'><i className="fa-solid fa-location-dot"></i> <span>İnönü mahallesi orhancık sokak no:4</span></li>
                                <li className='contact-icon'><i className="fa-solid fa-envelope"></i><span>erdal_bal22@hotmail.com</span></li>
                                <li className='contact-icon'><i className="fa-solid fa-phone"></i><span>0531 960 59 07</span></li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>

        </>
    )
}

export default Footer
