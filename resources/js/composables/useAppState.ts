import { reactive } from 'vue';

interface AppState {
    isPageLoading: boolean;
}

export const appState = reactive<AppState>({
    isPageLoading: true, // Defaults to true so it shows on the very first initial load
});
