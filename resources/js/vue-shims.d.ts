import { RouteFunction } from 'ziggy-js';
import { PageProps as InertiaPageProps } from '@inertiajs/inertia';

declare module '@vue/runtime-core' {
    export interface ComponentCustomProperties {
        route: RouteFunction;
    }
}

declare module '@inertiajs/inertia' {
    interface PageProps extends InertiaPageProps {
        auth?: {
            user?: {
                name: string;
                email: string;
            };
        };
    }
}
