import { BrowserRouter, Routes, Route } from 'react-router-dom';
import {
  AboutPage,
  AccountPage,
  CartPage,
  CollectionPage,
  ContactPage,
  HomePage,
  LoginPage,
  NewsPage,
  NotFoundPage,
  OrderDetailPage,
  OrdersPage,
  ProductsPage,
  ProfilePage,
  RegisterPage,
} from './pages/common';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/about-us" element={<AboutPage />} />
        <Route path="/contact" element={<ContactPage />} />
        <Route path="/news" element={<NewsPage />} />
        <Route path="/collections/all-products" element={<ProductsPage />} />
        <Route path="/collections/:slug" element={<CollectionPage />} />
        <Route path="/products/:slug" element={<ProductsPage />} />
        <Route path="/cart" element={<CartPage />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/register" element={<RegisterPage />} />
        <Route path="/account" element={<AccountPage />}>
          <Route index element={<ProfilePage />} />
          <Route path="orders" element={<OrdersPage />} />
          <Route path="orders/:id" element={<OrderDetailPage />} />
        </Route>
        <Route path="*" element={<NotFoundPage />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
