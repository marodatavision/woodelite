import React from 'react';
import AppLogo from '../layout/app-logo';
import PageLayout from '../layout/page-layout';

const Home = (props) => {
    return (
        <PageLayout>
            <div className="p-5 grid grid-cols-1 place-items-center">
                <AppLogo />
            </div>
            <div>
                Home
            </div>
        </PageLayout>
    )
}

export default Home;