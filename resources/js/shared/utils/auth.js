export function isLoggedIn() {
    return localStorage.getItem('isLoggedIn') ?? 0;
}

export function logIn() {
    localStorage.setItem('isLoggedIn', true);
}

export function logOut() {
    localStorage.clear();
}
