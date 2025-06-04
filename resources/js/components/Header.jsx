import React from 'react'
import { NavLink } from "react-router-dom";
import '../../css/header.css'
function Header() {
    return (
  <>    
<header style={{background :'#002147'}} className="text-white py-2">
  <div className="container px-5 d-flex justify-content-between align-items-center">
    <div>
      <small>Telefon: +90 123 456 7890 | Email: info@example.com</small>
    </div>
    <div>
      <a href="#" className="text-white me-3">Giriş Yap</a>
      <a href="#" className="text-white">Kayıt Ol</a>
    </div>
  </div>
</header>


<nav style={{background:'#174477'}} className="navbar navbar-expand-lg">
  <div className="container px-5">
    <a className="navbar-brand" href="#"><img style={{width:150}} src="/images/crawft-logo2.png" alt="" /></a>
    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span className="navbar-toggler-icon"></span>
    </button>
    <div className="collapse navbar-collapse" id="navbarNav">
      <ul className="navbar-nav ms-auto">
        <li className="nav-item">
          <NavLink to="/"  className={({isActive}) => `nav-link ${isActive ? 'active text-primary fw-bold' : '' }`}> Anasayfa </NavLink>
          
        </li>
        <li className="nav-item">
           <NavLink to="/about"  className={({isActive}) => `nav-link ${isActive ? 'active text-primary fw-bold' : '' }`}>Hakkımızda</NavLink>
        </li>
        <li className="nav-item">
           <NavLink to="/service"  className={({isActive}) => `nav-link ${isActive ? 'active text-primary fw-bold' : '' }`}>Hizmetler</NavLink>
        </li>
        <li className="nav-item">
           <NavLink to="/contact"  className={({isActive}) => `nav-link ${isActive ? 'active text-primary fw-bold' : '' }`}>İletişim</NavLink>
        </li>
      </ul>
    </div>
  </div>
</nav>



</> 
        
    )
}

export default Header
