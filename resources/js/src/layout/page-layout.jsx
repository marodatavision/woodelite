import React from 'react';

const PageLayout = (props) => {
    return(
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {
                        props.children
                    }
                </div>
            </div>
        </div>
    )
}

export default PageLayout;

