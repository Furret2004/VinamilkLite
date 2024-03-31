import PropTypes from 'prop-types';

function AdminLayout({ children }) {
  return <div className="min-h-screen">{children}</div>;
}

AdminLayout.propTypes = {
  children: PropTypes.node.isRequired,
};

export default AdminLayout;
