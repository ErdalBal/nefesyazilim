import React from 'react';
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from '../pages/Home';
import About from '../pages/About';
import Service from '../pages/Service';
import Contact from '../pages/Contact';
function App() {
    return (
        <>
            <Router>

                <Routes>

                    <Route path='/' element={<Home />} />
                    <Route path='/about' element={<About />} />
                    <Route path='/service' element={<Service/>} />
                    <Route path='/contact' element={<Contact/>} />
                </Routes>

            </Router>

            
        </>


    );
}

export default App;