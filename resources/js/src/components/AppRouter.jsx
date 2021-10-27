import React, { useState } from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
  } from "react-router-dom";
import { NAVBUTTON_ACTIVE, NAVBUTTON_DEACTIVE } from '../layout/navbutton-layout';
import Home from './Home';
import About from './About';


const AppRouter = (props) => {

    const [actualPage, setActualPage] = useState(null);

    const handleNavClick = (pageValue) => {
        setActualPage(pageValue);
    }

    return(
    <Router basename="/elite">
        <div className="w-full">
            <nav>
                <ul className="flex space-x-4 shadow-md bg-gray-800 py-3">
                    <li>
                        <a href="/dashboard"><img src="/images/timber_icon_bgless.png" height="100" width="100"/></a>
                    </li>
                    <li className={actualPage === 'home' ? NAVBUTTON_ACTIVE : NAVBUTTON_DEACTIVE}>
                        <Link to="/" onClick={e => handleNavClick('home')} >Home</Link>
                    </li>
                    <li className={actualPage === 'about' ? NAVBUTTON_ACTIVE : NAVBUTTON_DEACTIVE}>
                        <Link to="/about" onClick={e => handleNavClick('about')} >About</Link>
                    </li>
                </ul>
            </nav>

            {/* A <Switch> looks through its children <Route>s and
                renders the first one that matches the current URL. */}
            <Switch>
                <Route path="/about">
                    <About />
                </Route>
                <Route exact path="/">
                    <Home />
                </Route>
            </Switch>
        </div>
    </Router>
    )
}

export default AppRouter;