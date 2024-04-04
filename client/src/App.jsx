import { BrowserRouter, Routes, Route } from 'react-router-dom';
import {
  AboutPage,
  CartPage,
  CollectionPage,
  ContactPage,
  HomePage,
  LoginPage,
  NewsPage,
  OrderDetailPage,
  OrdersPage,
  ProductsPage,
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
        <Route path="/account/login" element={<LoginPage />} />
        <Route path="/account/register" element={<RegisterPage />} />
        <Route path="/collections/all-products" element={<ProductsPage />} />
        <Route path="/collections/:slug" element={<CollectionPage />} />
        <Route path="/products/:slug" element={<ProductsPage />} />
        <Route path="/cart" element={<CartPage />} />
        <Route path="/account/orders" element={<OrdersPage />} />
        <Route path="/account/orders/:id" element={<OrderDetailPage />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
