function getCookieValue(name) {
    const cookies = document.cookie.split('; ');
    for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split('=');
        if (cookieName === name) {
            return decodeURIComponent(cookieValue);
        }
    }
    return null;
}

async function fetchPageData(url, token, params = null) {
    const headers = {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
    };

    let finalUrl = url;
    if (params) {
        const queryParams = new URLSearchParams(params).toString();
        finalUrl += '?' + queryParams;
    }

    const response = await fetch(finalUrl, {
        method: 'GET',
        headers
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    return await response.json();
}

async function postPageData(url, token, data) {
    const headers = {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
    };

    const response = await fetch(url, {
        method: 'POST',
        headers,
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    return await response.json();
}

async function putPageData(url, token, data) {
    const headers = {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
    };

    const response = await fetch(url, {
        method: 'PUT',
        headers,
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    return await response.json();
}

async function deletePageData(url, token, params = null) {
    const headers = {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
    };

    let finalUrl = url;
    if (params) {
        const queryParams = new URLSearchParams(params).toString();
        finalUrl += '?' + queryParams;
    }

    const response = await fetch(finalUrl, {
        method: 'DELETE',
        headers
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    return await response.json();
}
async function patchPageData(url, token, data) {
    const headers = {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
    };

    const response = await fetch(url, {
        method: 'PATCH',
        headers,
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    return await response.json();
}

async function refreshToken(url, refreshToken) {
    const headers = {
        'Content-Type': 'application/json'
    };

    const response = await fetch(url, {
        method: 'POST',
        headers,
        body: JSON.stringify({ refresh_token: refreshToken })
    });

    if (!response.ok) {
        throw new Error(`Error ${response.status}: ${response.statusText}`);
    }

    const data = await response.json();
    return data.access_token; 
}

function handleError(error) {
    console.error('Terjadi kesalahan:', error);
    alert(`Kesalahan: ${error.message}`);
}

function buildUrlWithParams(baseUrl, params) {
    if (!params) {
        return baseUrl;
    }

    const queryParams = new URLSearchParams(params).toString();
    return `${baseUrl}?${queryParams}`;
}
