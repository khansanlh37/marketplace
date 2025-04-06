import { createInertiaApp } from '@inertiajs/inertia-react';
import { createRoot } from 'react-dom/client';
import { InertiaProgress } from '@inertiajs/progress';
import React from 'react';
import '../css/app.css';

InertiaProgress.init();

createInertiaApp({
    resolve: name => {
        const pages = {
            'Products/Index': import('./Pages/Products/Index.jsx'),
            'Products/Detail': import('./Pages/Products/Detail.jsx')
        };
        return pages[name] || Promise.reject(`Page ${name} not found`);
    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
}).catch((err) => console.error(err));
