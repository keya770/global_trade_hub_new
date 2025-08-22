<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Global Trade Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-900">Global Trade Hub Admin</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500">Welcome, Admin</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 p-8">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Admin Dashboard</h2>
                        <p class="text-gray-600 mb-8">Welcome to your admin panel. This is where you can manage your Global Trade Hub website.</p>
                        
                        <!-- Quick Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h3 class="text-lg font-semibold text-gray-900">Total Users</h3>
                                <p class="text-3xl font-bold text-blue-600">0</p>
                            </div>
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h3 class="text-lg font-semibold text-gray-900">Total Vessels</h3>
                                <p class="text-3xl font-bold text-green-600">0</p>
                            </div>
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h3 class="text-lg font-semibold text-gray-900">Total Services</h3>
                                <p class="text-3xl font-bold text-purple-600">0</p>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                            <div class="flex flex-wrap justify-center gap-4">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                    Manage Users
                                </button>
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                    Manage Vessels
                                </button>
                                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                                    Manage Services
                                </button>
                                <button class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                                    View Website
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
