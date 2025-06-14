<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gen Z Customer Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <div class="max-w-3xl mx-auto p-6">
    <!-- Header -->
    <header class="text-center mb-8">
      <h1 class="text-3xl font-bold mb-1">Hello, Chandy 👋</h1>
      <p class="text-gray-600 text-lg">Welcome to your customer dashboard</p>
    </header>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-md p-6 text-center mb-6">
      <img src="https://i.pinimg.com/736x/9f/db/fb/9fdbfbad03828b8e5ef8997a78499873.jpg" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
      <h2 class="text-xl font-semibold">Chandy Neat</h2>
      <p class="text-purple-500 font-medium">DevOps Enthusiast</p>
    </div>

    <!-- Search Box -->
    <div class="mb-6">
      <input
        type="text"
        placeholder="Search services..."
        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 shadow-sm"
      >
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow-lg p-5 text-center">
        <h3 class="text-lg font-bold mb-1">My Orders</h3>
        <p class="text-sm text-gray-500 mb-3">Track and manage your purchases</p>
        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">View</button>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow-lg p-5 text-center">
        <h3 class="text-lg font-bold mb-1">My Profile</h3>
        <p class="text-sm text-gray-500 mb-3">Update personal information</p>
        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">Edit</button>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow-lg p-5 text-center">
        <h3 class="text-lg font-bold mb-1">Support</h3>
        <p class="text-sm text-gray-500 mb-3">Need help? Reach out!</p>
        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">Contact</button>
      </div>
    </div>
  </div>

</body>
</html>
